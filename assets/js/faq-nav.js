/**
 * FAQ page navigation (inc/patterns/<flow>/faq-page.php).
 *
 * - Desktop (>= 1024px): the "Categories" details stay open (a sticky column) and cannot be
 *   collapsed; phones: collapsed dropdown, closed again after a link is picked.
 * - The link of the group in view gets .is-current; its title is mirrored into the summary
 *   (data-current) for the phone dropdown.
 */
(function () {
	const nav = document.querySelector(".faq-nav");
	if (!nav) {
		return;
	}
	const summary = nav.querySelector("summary");
	const links = Array.from(nav.querySelectorAll("a[href^='#']"));
	const desktop = window.matchMedia("(min-width: 1024px)");

	const syncOpen = () => {
		nav.open = desktop.matches;
	};
	syncOpen();
	desktop.addEventListener("change", syncOpen);

	summary.addEventListener("click", (event) => {
		if (desktop.matches) {
			event.preventDefault();
		}
	});

	const setCurrent = (id) => {
		links.forEach((link) => {
			const current = link.getAttribute("href") === "#" + id;
			link.classList.toggle("is-current", current);
			if (current) {
				summary.dataset.current = link.textContent;
			}
		});
	};

	links.forEach((link) => {
		link.addEventListener("click", () => {
			setCurrent(link.getAttribute("href").slice(1));
			if (!desktop.matches) {
				nav.open = false;
			}
		});
	});

	const groups = links
		.map((link) => document.getElementById(link.getAttribute("href").slice(1)))
		.filter(Boolean);
	if (!groups.length) {
		return;
	}
	setCurrent(groups[0].id);

	// The current group is the last one whose top has passed a line under the fixed header.
	const update = () => {
		const line = 140;
		let current = groups[0];
		groups.forEach((group) => {
			if (group.getBoundingClientRect().top <= line) {
				current = group;
			}
		});
		setCurrent(current.id);
	};
	window.addEventListener("scroll", update, { passive: true });
	update();
})();
