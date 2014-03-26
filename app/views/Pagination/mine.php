<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);

	$trans = $environment->getTranslator();
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<ul class="pagination link">
		<?php
			echo $presenter->getPrevious($trans->trans('pagination.previous'));

			echo $presenter->getNext($trans->trans('pagination.next'));
		?>
	</ul>
<?php endif; ?>
