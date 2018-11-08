<?php
/**
* @package Sj Basic News
* @version 3.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* @copyright (c) 2012 YouTech Company. All Rights Reserved.
* @author YouTech Company http://www.smartaddons.com
*
*/
defined('_JEXEC') or die;
// includes placehold
$yt_temp = JFactory::getApplication()->getTemplate();
include (JPATH_BASE . '/templates/'.$yt_temp.'/includes/placehold.php');
?>

<?php 
	$options=$params->toObject();
	$image_config = array(
    	'output_width'  => $params->get('item_image_width'),
    	'output_height' => $params->get('item_image_height'),
    	'function'		=> $params->get('item_image_function'),
    	'background'	=> $params->get('item_image_background')
    );
?>
<?php	
	if (!empty($list)) { ?>
	<?php if ( !empty($options->pretext)){ ?>
         <div class="bsn-pretext"><?php echo $options->pretext; ?></div>
    <?php } ?>
	<div class="bsn-wrap">
	 <?php $count = 0; foreach ($list as $items) {
	 
	 $count++; 
	 if($count == count($list)){
		 $iditem = ' last-item';
	 }else if($count == 1){
		 $iditem = ' first-item';
	 }else{
		 $iditem = '';
	 }
	 ?>
	  <div class="item post<?php if($params->get('showline')){ echo ' showlinebottom'.$iditem; } ?>">
	       
		        <?php if ($options->item_image_display==1 ){?>
		        	<div class="bsn-image">
			        	
			        		<?php	
								//Create placeholder images
								$src = $items->image;
								if (file_exists($src )) {	echo "<img src='". Ytools::resize($items->image, $image_config)."' alt='".$items->title. "'/>";} 
								else if ($is_placehold) {	echo yt_placehold($placehold_size['featured_posts'] );}								
							?>
						
         
		        	</div>
		        <?php } ?>
			        <h2>
			        	<a title="<?php echo $items->title?>" target="<?php echo $options->item_link_target; ?>" href="<?php echo $items->link?>"><?php echo YTools::truncate($items->title,$options->item_title_max_characs);?></a>
			        </h2>
			   <?php if ($options->item_desc_display == 1 ){?>
		            <p class="basicnews-desc"><?php echo Ytools::truncate($items->description,$options->item_desc_max_characs);?></p>
		       <?php } ?>
			   <?php if( $options->item_date_display==1 || $options->cat_title_display==1 ){?>
		       
			      
			       <?php if ($options->item_date_display == 1):?>
					 <p>
						
			       		<span class="basic-date"><?php echo JHtml::date($items->created, 'd.m.Y'); ?></span>
						<span class="basic-hits"><?php echo $items->hits;?></span>
					</p> 
			        <?php endif; ?>
		              	
		        <?php } ?>
	        <!--
			<a class="more" title="<?php echo $items->title?>" target="<?php echo $options->item_link_target; ?>" href="<?php echo $items->link?>">
				<?php //echo JText::_('READ_MORE'); ?>
			</a>
			-->
	  </div>  
	  <?php }  ?>
	  
	</div>
	<?php if ( !empty($options->posttext)){ ?>
         <div class="bsn-posttext"><?php echo $options->posttext; ?></div>
    <?php } ?>
<?php  } else { ?>
<p>Has no connect to show!</p>
<?php } ?>


