<?php
$mcd_center_id = isset( $this->mcd_settings['center_id'] ) ? $this->mcd_settings['center_id'] : 0;
?>

<div ng-app="MyCenterPortalApp" ng-controller="DealsCtrl" data-url="<?= MCD_API_DEALS.'?center='.$mcd_center_id ?>">
	<div class="mycenterdeals-wrapper mycenterdeals">
		<div id="mcd-filters" ng-hide="busy || data.error" ng-cloak>
			<span id="mcd-filters-title">Sort by: </span>
			<div id="mcd-filters-order" class="clearfix">
				<a class="mcd-filter-order" ng-click="selectType('recent')" ng-class="{ active: selectedType=='recent' }">Recently Added</a>
				<a class="mcd-filter-order" ng-click="selectType('expiry')" ng-class="{ active: selectedType=='expiry' }">Ending Soon</a>
			</div>
		</div>

		<div id="mcd-error-msg" ng-show="data.error" ng-cloak>
			<div class="mcd-alert">{{ data.error }}</div>
		</div>

		<div id="mycenterdeals-wrapper" ng-class="{loading: busy}">
			<div id="mycenterdeals" class="mcd-grid<?= $this->mcd_settings['deals_listing_deals_per_row'] ?>">
				<a class="mcd-deal-item" ng-repeat="deal in data.deals" href="<?= mcd_single_page_url('mycenterdeal') ?>{{ deal.slug }}" ng-cloak>
					<span class="mcd-deal-image">
						<img ng-src="{{ deal.deal_image }}" />
						<span class="mcd-retailer-logo">
							<img ng-src="{{ deal.retailer_logo }}" />
						</span>
					</span>
					<span class="mcd-deal-content">
						<span class="mcd-deal-details">
							<span class="mcd-retailer-name">{{ deal.retailer_name }}</span>
							<span class="mcd-sep"></span>
							<span class="mcd-deal-title">{{ deal.deal_title }}</span>
							<span class="mcd-deal-end-date">Valid until {{ deal.deal_end_date }}</span>
						</span>
					</span>
				</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
	ga_event_tracking('Pages', 'Deals');
});
</script>
