<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 24.05.17
 * Time: 14:34
 */

namespace app\includes\models\admin\menu;
use \app\includes\TPPlugin;
use \app\includes\common\TPLang;

class TPFieldRailway {
	public function TPFieldThemesTable(){
		?>
		<input class="TPThemesNameHidden" type="hidden"
		       name="<?php echo TPOPlUGIN_OPTION_NAME;?>[themes_table_railway][name]"
		       value="<?php echo TPPlugin::$options['themes_table_railway']['name']?>"/>
		<?php
	}
	public function TPFieldShortcode_1(){
		$shortcode = 1;
		?>
        <div class="TP-HeadTable">
			<?php $this->getFieldTitle($shortcode); ?>
			<?php $this->getFieldTitleTag($shortcode); ?>
        </div>
		<?php //$this->getFieldExtraMarker($shortcode); ?>
		<?php $this->getFieldPaginate($shortcode); ?>
		<?php $this->getFieldTitleButton($shortcode); ?>
		<?php $this->getFieldSortTd($shortcode); ?>
		<?php
		//$this->getFieldSortableSection($shortcode);

	}

	/**
	 * @param $shortcode
	 * @param string $type
	 */
	public function getFieldTitle($shortcode, $type = 'shortcodes_railway'){
		?>
        <label>
            <span>
                <?php _ex('Title',
	                'admin page railway tab tables content title label', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
			<?php

			if (!array_key_exists(TPLang::getLang(), TPPlugin::$options[$type][$shortcode]['title'])){
				foreach(TPPlugin::$options[$type][$shortcode]['title'] as $key_local => $title){
					$typeFields = (TPLang::getDefaultLang() != $key_local)?'hidden':'text';
					?>
                    <input type="<?php echo $typeFields; ?>"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][title][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(TPPlugin::$options[$type][$shortcode]['title'][$key_local]) ?>"/>
					<?php
				}
			} else {
				foreach(TPPlugin::$options[$type][$shortcode]['title'] as $key_local => $title){
					$typeFields = (TPLang::getLang() != $key_local)?'hidden':'text';
					?>
                    <input type="<?php echo $typeFields; ?>"
                           name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][title][<?php echo $key_local; ?>]"
                           value="<?php echo esc_attr(TPPlugin::$options[$type][$shortcode]['title'][$key_local]) ?>"/>
					<?php
				}
			}


            ?>
            <p>
	            <?php _ex('Use {origin} and {destination} variables to add the city automatically',
		            'admin page railway tab tables content title help', TPOPlUGIN_TEXTDOMAIN); ?>
            </p>
        </label>
		<?php
	}
	/**
	 * @param $shortcode
	 */
	public function getFieldTitleTag($shortcode, $type = 'shortcodes_railway'){
		?>
        <label>
            <span>
                <?php _ex('Title tag',
	                'admin page railway tab tables content title tag', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>

            <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[<?php echo $type; ?>][<?php echo $shortcode; ?>][tag]" class="TP-Zelect">
                <option <?php selected(TPPlugin::$options[$type][$shortcode]['tag'], "div" ); ?>
                        value="div">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_1',
						'(DIV)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h1" ); ?>
                        value="h1">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_2',
						'(H1)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h2" ); ?>
                        value="h2">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_3',
						'(H2)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h3" ); ?>
                        value="h3">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_4',
						'(H3)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
                <option <?php selected( \app\includes\TPPlugin::$options[$type][$shortcode]['tag'], "h4" ); ?>
                        value="h4">
					<?php _ex('tp_admin_page_flights_tab_tables_content_shortcode_select_title_tag_value_5',
						'(H4)', TPOPlUGIN_TEXTDOMAIN); ?>
                </option>
            </select>

        </label>
		<?php
	}

	/**
	 * @param $shortcode
	 */
	public function getFieldPaginate($shortcode){
		?>
        <div class="ItemSub">
            <span>
                <?php _ex('Rows per page',
	                'admin page railway tab tables content paginate limit', TPOPlUGIN_TEXTDOMAIN); ?>
            </span>
            <div class="TP-childF">
                <div class="spinnerW clearfix" data-trigger="spinner">
                    <label>
                        <input name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_railway][<?php echo $shortcode; ?>][paginate]"
                               type="text" data-rule="quantity"
                               value="<?php echo esc_attr(TPPlugin::$options['shortcodes_railway'][$shortcode]['paginate']) ?>">
                    </label>
                    <div class="navSpinner">
                        <a class="navDown" href="javascript:void(0);" data-spin="down"></a>
                        <a class="navUp" href="javascript:void(0);" data-spin="up"></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="TP-HeadTable">
            <input id="chek-p1" type="checkbox" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_railway][<?php echo $shortcode; ?>][paginate_switch]"
                   value="1" <?php checked(isset(TPPlugin::$options['shortcodes_railway'][$shortcode]['paginate_switch']), 1) ?> hidden />
            <label for="chek-p1">
				<?php _ex('Paginate',
					'admin page railway tab tables content paginate', TPOPlUGIN_TEXTDOMAIN); ?>
            </label>
            <label></label>

        </div>


		<?php
	}

	public function getFieldTitleButton($shortcode){
		?>
        <div class="TP-HeadTable">
            <label>
                <span>
                    <?php _ex('Button Title',
	                    'admin page railway tab tables content button', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
				<?php

				if (!array_key_exists(TPLang::getLang(), TPPlugin::$options['shortcodes_railway'][$shortcode]['title'])){
					foreach(TPPlugin::$options['shortcodes_railway'][$shortcode]['title_button'] as $key_local => $title){
						$typeFields = (TPLang::getDefaultLang() != $key_local)?'hidden':'text';
						?>
                        <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_railway][<?php echo $shortcode; ?>][title_button][<?php echo $key_local; ?>]"
                               value="<?php echo esc_attr(TPPlugin::$options['shortcodes_railway'][$shortcode]['title_button'][$key_local]) ?>"/>
						<?php
					}
				} else {
					foreach(TPPlugin::$options['shortcodes_railway'][$shortcode]['title_button'] as $key_local => $title){
						$typeFields = (TPLang::getLang() != $key_local)?'hidden':'text';
						?>
                        <input type="<?php echo $typeFields; ?>" name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_railway][<?php echo $shortcode; ?>][title_button][<?php echo $key_local; ?>]"
                               value="<?php echo esc_attr(TPPlugin::$options['shortcodes_railway'][$shortcode]['title_button'][$key_local]) ?>"/>
						<?php
					}
				}


				?>
            </label>
            <label></label>
        </div>
		<?php
	}

	public function getFieldSortTd($shortcode){

		?>
        <div class="TP-HeadTable TPSortFieldSelect">
            <label class="TPSortFieldLabel">
                <span>
                    <?php _ex('Sort by column',
	                    'admin page railway tab tables content sort_column', TPOPlUGIN_TEXTDOMAIN); ?>
                </span>
                <select name="<?php echo TPOPlUGIN_OPTION_NAME;?>[shortcodes_railway][<?php echo $shortcode; ?>][sort_column]" class="TP-Zelect TPSortField">
					<?php
					if(!empty(TPPlugin::$options['shortcodes_railway'][$shortcode]['selected'])) {
						$selected = TPPlugin::$options['shortcodes_railway'][$shortcode]['selected'];
						foreach($selected as $key => $sel){
							?>
                            <option value="<?php echo $key;?>" <?php selected( TPPlugin::$options['shortcodes_railway'][$shortcode]['sort_column'], $key ); ?>>
								<?php echo $this->getFieldSortTDLabel($sel);?>
                            </option>
							<?php
						}
					}else{
						?>
                        <option disabled></option>
						<?php
					}
					?>
                </select>
            </label>
            <label></label>
        </div>
		<?php
	}
}