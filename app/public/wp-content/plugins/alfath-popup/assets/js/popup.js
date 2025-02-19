document.addEventListener("DOMContentLoaded", function () {

	const app = Vue.createApp({
		data() {
			return {
				popups: [],
				showPopup: false,
				activePopup: null,
				currentPage: window.location.pathname // Ambil halaman saat ini
			};
		},
		async created() {
			await this.fetchPopups();

			// Filter popup sesuai halaman saat ini
			const filteredPopups = this.popups.filter(popup =>
				popup.page === "" || popup.page === this.currentPage
			);

			if (filteredPopups.length > 0) {
				this.popups = filteredPopups; // Update popups hanya dengan yang cocok
				this.activePopup = 0;
				this.showPopup = true;
			} else {
				console.log("No popup data available for this page.");
			}
		},
		methods: {
			async fetchPopups() {
				try {
					const response = await fetch('/wp-json/artistudio/v1/popup', {
						credentials: 'include' // Kirim cookie untuk autentikasi
					});

					if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
					this.popups = await response.json();

				} catch (error) {
					console.error("Error fetching popup data:", error);
				}
			},
			closePopup() {
				this.showPopup = false;
				this.activePopup = null;
			},
			stripHtml(html) {
				let doc = new DOMParser().parseFromString(html, 'text/html');
				return doc.body.textContent || "";
			}
		},
		template: `
			<div v-if="showPopup && activePopup !== null" class="popup-overlay">
				<div class="popup-content">
					<button class="close-btn" @click="closePopup">&times;</button>
					<h2>{{ popups[activePopup].title }}</h2>
					<p>{{ stripHtml(popups[activePopup].description) }}</p>
					<small>Page: {{ popups[activePopup].page || "All Pages" }}</small>
				</div>
			</div>
		`
	});

	setTimeout(() => {
		if (document.querySelector("#popup-container")) {
			app.mount("#popup-container");
		} else {
			console.error("Error: #popup-container not found!");
		}
	}, 500);
});
