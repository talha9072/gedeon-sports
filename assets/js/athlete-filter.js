/**
 * Our Athletes: stage filter pills. Each pill links to #stage-1 … #professional (or #all); cards
 * carry a matching gs-stage-* class. Without JavaScript all cards stay visible.
 */
(function () {
	document.querySelectorAll('.gs-filters').forEach(function (filters) {
		var grid = filters.parentElement.querySelector('.gs-athlete-grid');
		if (!grid) {
			return;
		}
		filters.addEventListener('click', function (event) {
			var link = event.target.closest('a[href^="#"]');
			if (!link) {
				return;
			}
			event.preventDefault();
			var key = link.getAttribute('href').slice(1);
			filters.querySelectorAll('.wp-block-button').forEach(function (button) {
				button.classList.toggle('is-active', button.contains(link));
			});
			Array.prototype.forEach.call(grid.children, function (card) {
				card.hidden = key !== 'all' && !card.classList.contains('gs-stage-' + key);
			});
		});
	});
})();
