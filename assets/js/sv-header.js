document.addEventListener('DOMContentLoaded', () => {
	if (window.matchMedia('(max-width: 1199px)').matches) {
		const header = document.querySelector('#sv-header');
		const body = document.body;
		const navCloseButton = header.querySelector('.sv-header__navClose');
		const checkbox = header.querySelector('.sv-header__checkbox');
		const backButton = header.querySelectorAll('.sv-header__back-button');
		const subMenus = header.querySelectorAll('.menu-item-has-children .submenu-wrapper');
		const menuItems = header.querySelectorAll('.menu-item-has-children > a');
		const menu = header.querySelector('#sv-header__menu');

		const updateBodyClass = () => {
			const isChecked = checkbox.checked;
			body.classList.toggle('body--with-checkbox-checked', isChecked);
			if (isChecked) {
				setTimeout(() => {
					window.scroll({ top: -1, left: 0, behavior: 'smooth' });
				}, 10);
			}
		};

		const resetSubmenu = () => {
			subMenus.forEach(submenu => {
				submenu.classList.remove('submenu-container--show');
				menu.classList.remove('close');
			});
		};

		backButton.forEach(button => {
			button.addEventListener('click', () => {
				const submenuContainer = button.closest('.menu-item-has-children .submenu-wrapper');
				if (submenuContainer) {
					submenuContainer.classList.remove('submenu-container--show');
					menu.classList.remove('close');
				}
			});
		});

		menuItems.forEach(item => {
			item.addEventListener('click', event => {
				event.preventDefault();
				const submenu = item.nextElementSibling;
				if (submenu && submenu.classList.contains('submenu-wrapper')) {
					const isSubMenuVisible = submenu.classList.contains('submenu-container--show');
					submenu.classList.toggle('submenu-container--show');
					if (!isSubMenuVisible) {
						menu.classList.add('close');
					} else {
						menu.classList.remove('close');
					}
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