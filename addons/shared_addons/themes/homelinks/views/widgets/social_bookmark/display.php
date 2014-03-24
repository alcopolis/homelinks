<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js"></script>


<?php if ($mode == 'two_column'): ?>
<style type="text/css">
.addthis_toolbox .two_column
{
    width: 216px;
    padding: 10px 0 10px 0px;
}

.addthis_toolbox .two_column a
{
    padding: 4px 0 4px 34px;
    position: relative;
    width: 66px;
    display: block;
    text-decoration: none;
}

.addthis_toolbox .two_column span
{
    position: absolute;
    left: 14px;
    top: 4px;
}

.addthis_toolbox .two_column  .top
{
    padding: 0 0 10px 0;
    margin-bottom: 10px;
    margin: 0 20px 10px 20px;
}

.addthis_toolbox .two_column .more span
{
    display: none;
}

.addthis_toolbox .two_column .column1
{
    width: 100px;
    float: left;
}

.addthis_toolbox .two_column .column2
{
    width: 100px;
    float: left;
}

.addthis_toolbox .two_column .clear
{
    clear: both;
    padding: 0;
    display: block;
    height: 0;
    width: 0;
}
</style>
<div class="addthis_toolbox">
    <div class="two_column">
        <div class="column1">
            <a class="addthis_button_email">Email</a>
        </div>
        <div class="column2">
            <a class="addthis_button_print">Print</a>
        </div>
        <div class="clear"></div>
        <div class="top">
        </div>
        <div class="column1">
            <a class="addthis_button_twitter">Twitter</a>
            <a class="addthis_button_facebook">Facebook</a>
            <a class="addthis_button_myspace">MySpace</a>
        </div>
        <div class="column2">
            <a class="addthis_button_delicious">Delicous</a>
            <a class="addthis_button_stumbleupon">Stumble</a>
            <a class="addthis_button_digg">Digg</a>
        </div>
        <div class="clear"></div>
        <div class="more">
            <a class="addthis_button_expanded">More Destinations...</a>
        </div>
    </div>
</div>
<?php elseif($mode == 'vertical'): ?>
<style type="text/css">
.addthis_toolbox.vertical
{
    width: 100%;
}

.addthis_toolbox.vertical a
{
    width: 32px; height:32px;
    position: relative;
    display: block;
	border-radius:5px;
	overflow:hidden;
	margin:5px 0;
    text-decoration: none;
}

.addthis_toolbox.vertical span
{
    position: absolute;
}

.addthis_toolbox.vertical .more span
{
    display: none;
}
</style>


<div class="addthis_toolbox vertical addthis_32x32_style">
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_expanded"></a>
</div>

<?php else: ?>
<style type="text/css">
.addthis_toolbox.addthis_default_style span{margin-right:0; padding:0;}
.addthis_toolbox.addthis_default_style a
{
    position: relative;
    display: block;
	border-radius:5px;
	overflow:hidden;
    text-decoration: none;
}
</style>

<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
    <span style="display:block; margin-right:10px; font-size:12px; float:left;">Share</span>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_expanded"></a> 
</div>
<?php endif ?>