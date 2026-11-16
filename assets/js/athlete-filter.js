/**
 * Our Athletes: stage filter pills. Each pill links to #stage-1 … #professional (or #all); cards
 * carry a matching gs-stage-* class (gs-stage-1, gs-stage-2, gs-stage-3, gs-stage-professional).
 * Without JavaScript all cards stay visible.
 */
(function () {
	document.querySelectorAll('.gs-filters').forEach(function (filters) {
		var grid = filters.parentElement.querySelector('.gs-athlete-grid');
		if (!grid) {
			return;
		}

		var empty = document.createElement('p');
		empty.className = 'gs-athlete-grid__empty';
		empty.textContent = 'No athletes at this stage yet.';
		empty.hidden = true;
		grid.parentNode.insertBefore(empty, grid.nextSibling);

		filters.addEventListener('click', function (event) {
			var link = event.target.closest('a[href^="#"]');
			if (!link) {
				return;
			}
			event.preventDefault();
			var key = link.getAttribute('href').slice(1);
			var cls = 'gs-stage-' + key.replace(/^stage-/, '');
			var shown = 0;
			filters.querySelectorAll('.wp-block-button').forEach(function (button) {
				button.classList.toggle('is-active', button.contains(link));
			});
			Array.prototype.forEach.call(grid.children, function (card) {
				card.hidden = key !== 'all' && !card.classList.contains(cls);
				if (!card.hidden) {
					shown++;
				}
			});
			empty.hidden = shown > 0;
		});
	});
})();
