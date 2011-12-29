<?php 

function dpcdn_manage_option_page(){
	global $dpcache;
		$css;
		$js;
		$img;
		$cssdefault;
		$jsdefault;
		$imgdefault;
		$usecssdefault = 0;
		$usejsdefault = 0;
		$useimgdefault = 0;
		if(!empty($_POST)){
			$css = $_POST['css'];
			$js = $_POST['js'];
			$img = $_POST['img'];
			$cssdefault = $_POST['cssdefault'];
			$jsdefault = $_POST['jsdefault'];
			$imgdefault = $_POST['imgdefault'];
			if(!empty($_POST['usecssdefault'])){
				$usecssdefault = 1;
			}
			if(!empty($_POST['usejsdefault'])){
				$usejsdefault = 1;
			}
			if(!empty($_POST['useimgdefault'])){
				$useimgdefault = 1;
			}
			update_option( 'ms_css_cdn', $css );
			update_option( 'ms_js_cdn', $js );
			update_option( 'ms_img_cdn', $img );
			update_option( 'ms_css_default', $cssdefault );
			update_option( 'ms_js_default', $jsdefault );
			update_option( 'ms_img_default', $imgdefault );
			update_option( 'ms_css_use_default', $usecssdefault );
			update_option( 'ms_js_use_default', $usejsdefault );
			update_option( 'ms_img_use_default', $useimgdefault );
			if(isset( $dpcache )){
				$dpcache->set( 'ms_css_cdn', $css );
				$dpcache->set( 'ms_js_cdn', $js );
				$dpcache->set( 'ms_img_cdn', $img );
				$dpcache->set( 'ms_css_default', $cssdefault );
				$dpcache->set( 'ms_js_default', $jsdefault );
				$dpcache->set( 'ms_img_default', $imgdefault );
				$dpcache->set( 'ms_css_use_default', $usecssdefault );
				$dpcache->set( 'ms_js_use_default', $usejsdefault );
				$dpcache->set( 'ms_img_use_default', $useimgdefault );
			}
		}
		else{
			if(!isset( $dpcache )){
				$css = get_option('ms_css_cdn');
				$js = get_option('ms_js_cdn');
				$img = get_option('ms_img_cdn');
				$cssdefault = get_option('ms_css_default');
				$jsdefault = get_option('ms_js_default');
				$imgdefault = get_option('ms_img_default');
				$usecssdefault = get_option('ms_css_use_default');
				$usejsdefault = get_option('ms_js_use_default');
				$useimgdefault = get_option('ms_img_use_default');
			}
			else{
				if(!$dpcache->contais('ms_css_cdn'))
					$dpcache->set('ms_css_cdn',get_option('ms_css_cdn'));
				$css = $dpcache->get('ms_css_cdn');
				
				if(!$dpcache->contais('ms_js_cdn'))
					$dpcache->set('ms_js_cdn',get_option('ms_js_cdn'));
				$js = $dpcache->get('ms_js_cdn');
				
				if(!$dpcache->contais('ms_img_cdn'))
					$dpcache->set('ms_img_cdn',get_option('ms_img_cdn'));
				$img = $dpcache->get('ms_img_cdn');
				
				if(!$dpcache->contais('ms_css_default'))
					$dpcache->set('ms_css_default',get_option('ms_css_default'));
				$cssdefault = $dpcache->get('ms_css_default');
				
				if(!$dpcache->contais('ms_js_default'))
					$dpcache->set('ms_js_default',get_option('ms_js_default'));
				$jsdefault = $dpcache->get('ms_js_default');
				
				if(!$dpcache->contais('ms_img_default'))
					$dpcache->set('ms_img_default',get_option('ms_img_default'));
				$imgdefault = $dpcache->get('ms_img_default');
				
				if(!$dpcache->contais('ms_css_use_default'))
					$dpcache->set('ms_css_use_default',get_option('ms_css_use_default'));
				$usecssdefault = $dpcache->get('ms_css_use_default');
				
				if(!$dpcache->contais('ms_js_use_default'))
					$dpcache->set('ms_js_use_default',get_option('ms_js_use_default'));
				$usejsdefault = $dpcache->get('ms_js_use_default');
				
				if(!$dpcache->contais('ms_img_use_default'))
					$dpcache->set('ms_img_use_default',get_option('ms_img_use_default'));
				$useimgdefault = $dpcache->get('ms_img_use_default');
			}
			$path = get_template_directory_uri();
			if(empty($cssdefault)){
				$cssdefault = $path . "/";
			}
			if(empty($jsdefault)){
				$jsdefault = $path . "/js/";
			}
			if(empty($imgdefault)){
				$imgdefault = $path . "/img/";
			}
			
		}
		if($usecssdefault){
			$usecssdefault = "checked";
		}
		else {
			$usecssdefault = "";
		}
		if($usejsdefault){
			$usejsdefault = "checked";
		}
		else {
			$usejsdefault = "";
		}
		if($useimgdefault){
			$useimgdefault = "checked";
		}
		else {
			$useimgdefault = "";
		}
?>
		<div class="wrap"><h1>Manage CDN</h1>
		<?php
		if(isset( $dpcache )){
			echo "<h3>Caching is <i style='color:red;'>enabled</i></h3>";
		}
		else {
			echo "<h3>Caching is <i style='color:red;'>disabled</i></h3>";
		}
		?>
		<form method="POST" action="">
		<h2>CSS CDN</h2>
		<?php $dpcache->set("pippo","pippo");?>
		<label>Insert CSS default location</label><br>
		<input type="text" name="cssdefault" size="50" value="<?php echo $cssdefault; ?>"><br>
		<label>Use CSS default location?</label>&nbsp;<input type="checkbox" name="usecssdefault" <?php echo  $usecssdefault; ?>><br>
		<label>Insert CSS CDN server address</label><br>
		<input type="text" name="css" size="50" value="<?php echo  $css; ?>"><br>
		<h2>JS CDN</h2>
		<label>Insert JS default location</label><br>
		<input type="text" name="jsdefault" size="50" value="<?php echo $jsdefault; ?>"><br>
		<label>Use JS default location?</label>&nbsp;<input type="checkbox" name="usejsdefault" <?php echo $usejsdefault; ?>><br>
		<label>Insert JS CDN server address</label><br>
		<input type="text" name="js" size="50" value="<?php echo $js; ?>"><br>
		<h2>IMG CDN</h2>
		<label>Insert IMG default location</label><br>
		<input type="text" name="imgdefault" size="50" value="<?php echo $imgdefault; ?>"><br>
		<label>Use IMG default location?</label>&nbsp;<input type="checkbox" name="useimgdefault" <?php echo $useimgdefault; ?>><br>
		<label>Insert IMG CDN server address</label><br>
		<input type="text" name="img" size="50" value="<?php echo $img ?>"><br>
		<input type="submit" value="Save" style="margin:10px 0 0 120px; width:100px">
		</form></div>
<?php		
	}


?>