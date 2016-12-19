<?php 
	include $PATH['HELPERS'].'sphinxapi.php';
	$cl = new SphinxClient();
	$cl->SetServer( "127.0.0.1", 9312);
	$cl->SetMatchMode(SPH_MATCH_EXTENDED);
	$cl->SetRankingMode(SPH_RANK_SPH04);
	if(isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0){
		$limit = $_GET['limit'];
	} else {
		$limit = 25;
	}
	if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0){
		$start_pos = ($_GET['page'] - 1) * $limit;
		$page = $_GET['page'];
	} else {
		$start_pos = 0;
		$page = 1;
	}
	$cl->SetLimits($start_pos,$limit);
	$search_string = '"'.$cl->EscapeString($_GET['search_string']).'"/1';
	$search_results = $cl->Query($search_string,'search_reg');

 ?>

<div class='container'>
	<div class='col-xs-12 hidden-sm hidden-md hidden-lg'>
		<form name='search_bar' method='get' action='.' role="search">
			<input type="hidden" name="view" id="view" value="search">
			<label>
	      <div class="input-group">
	      	<div class='input-group-addon'><i class="fa fa-search text-white"></i></div>
	        <input name='search_string' type="text" class="form-control" placeholder="Search">
	      </div>
	    	<button type="submit" name='Go' class="btn btn-default">Submit</button>
	    </label>
		</form>
	</div>
	<div class='row'>
		<div class='col-xs-12 detail-software-backdrop drop-shadow'>

		<span class="text-blue">Search String:</span>
		<span class="text-blue"><strong><?php echo $cl->EscapeString($_GET['search_string']).'<br>'; ?></strong></span>
		<?php if(!$search_results): ?>
			ERROR<br>
			<?= $cl->GetLastError(); ?>
		<?php else: ?>
			<?php $got = count ($search_results['matches']); ?>
			<span class="text-pink"?>
				<?='Query matched '.$search_results['total_found'].' documents total<br> '; ?>
			</span>
			<?php $n = $start_pos;
			$matches = $search_results['matches'];
			?>

			<?php foreach ($matches as $match): ?>
			<?php 
				$itemid = $match['attrs']['itemid'];
				include $PATH['INC'].'query_search_reg.php'; 
			?>
				<div class='col-xs-12 col-sm-8 col-md-6 margin-15'>
					<div class='col-xs-12'>
						<a href=<?='?view=sw_details&swid='.$search_view_results['itemid']; ?>><?=$search_view_results['sw_name']; ?></a>
					</div>
					<div class='col-xs-12'>
						<small>
							<a href=<?='?view=sw_details&swid='.$search_view_results['itemid']; ?>
							   title=<?=__ROOT__.'?view=sw_details&swid='.$search_view_results['itemid'];?>>
								<?=limit_str(__ROOT__.'?view=sw_details&swid='.$search_view_results['itemid'],50);?>
							</a>
						</small>
					</div>
					<div class='col-xs-12'>
						<?=htmlentities(limit_str($search_view_results['sw_desc'],100),ENT_IGNORE,"UTF-8"); ?>
					</div>
				</div>
				<div class='col-xs-0 col-sm-2 col-md-6'>

				</div>
		
						
					
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
		<div class='col-xs-12'>
			<?php echo CreateSearchLinks($page,$limit,$search_results['total_found'],'pagination pagination-sm'); ?>
		</div>
	</div>
</div>

















	</div>
	
