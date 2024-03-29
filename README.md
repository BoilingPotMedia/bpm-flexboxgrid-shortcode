# bpm-flexboxgrid-shortcode
BPM Flexbox Shortcode Plugin

Required:
* http://flexboxgrid.com/

Included Shortcodes:

* [row]Enter Columns[/row]
* [col]Enter Content[/col]

Both [row] and [col] must be closed, as illustrated above.

ROW Shortcode accepts one parameter: class.

    [row class=""]Enter Columns[/row]

Classes are rarely needed for ROW, and make legibilty increasingly difficult. Flexbox Grid classes that will impact ROW can be explored at flexboxgrid.com. Review the sections: Alignment, Distribution, Reversing

COL Shortcode accepts nine parameters: xs, sm, md, lg, xs-offset, sm-offset, md-offset, lg-offset, and class.

    [col xs=12 sm=6 ]Enter Columns[/col]

Often, only two parameters are needed for COL, XS and SM.

Here are a few clarifying rules:

* Each row is divided into 12 units (or, "12 columns equals 100% of the row").
* XS (extra small) is the column width rule that is applied on small devices (touchscreen phones). 
* SM (small) is the column width rule that is applied to most medium size devices (tablets). 
* LG (large) is the column width rule that is applied to large size devices (computer screens).
* If no column width rule is set for LG for computer screens, the website will use the column width rule that is set for SM for computer screens.

Accordingly, to create a layout that has two, side by side columns on computers, but a single column on phones, you would write:

    [row]
    [col xs=12 sm=6]Content Left on Computer (Content Top on Phone)[/col]
    [col xs=12 sm=6]Content Right on Computer (Content Bottom on Phone)[/col]
    [/row]

Other parameters and classes that will impact COL can be explored at flexboxgrid.com. 

 	/* FlexBoxGrid_Row_Shortcode
	 *
	 * [row &params ]
	 *
	 * @ class			- (optional) 
	 * @ halign			- (optional) start-[col], center-[col], end-[col]
	 * @ valign			- (optional) top-[col], middle-[col], bottom-[col] 
	 * @ distribute		- (optional) around-[col], between-[col] 
	 * @ reverse		- (optional) reverse	
	 */	
	 
	 
 	/* FlexBoxGrid_Column_Shortcode
	 *
	 * [col &params ]
	 *
	 * @ class		- (optional) any custom CSS class
	 * @ xs			- (optional) such as: xs="12"
	 * @ sm			- (optional) such as: sm="6"
	 * @ md			- (optional) such as: md="4"
	 * @ lg			- (optional) such as: lg="3"
	 * @ xs-offset	- (optional) such as: xs-offset="1"
	 * @ sm-offset	- (optional) such as: sm-offset="3"
	 * @ md-offset	- (optional) such as: md-offset="4"
	 * @ lg-offset	- (optional) such as: lg-offset="6"
	 * @ reorder	- (optional) first-[col] or last-[col]
	 */
