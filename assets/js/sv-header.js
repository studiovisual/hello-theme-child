document.addEventListener('DOMContentLoaded', () => {
	if (window.matchMedia('(max-width: 1024px)').matches) {
		const header = document.querySelector('#sv-header');
		const body = document.body;
		const navCloseButton = header.querySelector('.sv-header__navClose');
		const checkbox = header.querySelector('.sv-header__checkbox');
		const backButton = header.querySelectorAll('.sv-header__back-button');
		const subMenus = header.querySelectorAll('.menu-item-has-children .submenu-wrapper');
		const menuItems = header.querySelectorAll('.menu-item-has-children > a');

		const updateBodyClass = () => {
			const isChecked = checkbox.checked;
			body.classList.toggle('body--with-checkbox-checked', isChecked);
		};

		const resetSubmenu = () => {
			subMenus.forEach(submenu => submenu.classList.remove('submenu-container--show'));
		};

		backButton.forEach(button => {
			button.addEventListener('click', () => {
				const submenuContainer = button.closest('.menu-item-has-children .submenu-wrapper');
				if (submenuContainer) {
					submenuContainer.classList.remove('submenu-container--show');
				}
			});
		});

		menuItems.forEach(item => {
			item.addEventListener('click', event => {
				event.preventDefault();
				const submenu = item.nextElementSibling;
				if (submenu && submenu.classList.contains('submenu-wrapper')) {
					submenu.classList.toggle('submenu-container--show');
				}
			});
		});

		// Eventos
		checkbox.addEventListener('change', updateBodyClass);
		navCloseButton.addEventListener('click', resetSubmenu);
	}

	// Função para abrir a pesquisa
	const overlay = document.getElementById('search-overlay');
	const openButton = document.querySelector('.sv-header__icon-search');
	const closeButton = document.getElementById('close-search-overlay');

	function toggleOverlay(isVisible) {
			overlay.classList.toggle('search-overlay--visible', isVisible);
			overlay.classList.toggle('search-overlay--hidden', !isVisible);
	}

	openButton.addEventListener('click', () => toggleOverlay(true));

	closeButton.addEventListener('click', () => toggleOverlay(false));

	overlay.addEventListener('click', (e) => {
			if (e.target === overlay) {
					toggleOverlay(false);
			}
	});
});

