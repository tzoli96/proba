// app.js
new Vue({
    el: '#app',
    data: {
        hotels: [],
        uniqueCountries: new Set(),
        uniqueCities: new Set(),
        selectedCountry: '',
        selectedCity: '',
        orderBy: '',
        currentPage: 1,
        pageSize: 21,
    },
    computed: {
        filteredHotels() {
            const countryFilter = this.selectedCountry.toLowerCase();
            const cityFilter = this.selectedCity.toLowerCase();

            return this.hotels.filter(hotel =>
                (!countryFilter || hotel.country.toLowerCase() === countryFilter) &&
                (!cityFilter || hotel.city.toLowerCase() === cityFilter)
            );
        },
        sortedHotels() {
            if (this.orderBy === 'price') {
                return this.filteredHotels.slice().sort((a, b) => a.price - b.price);
            } else if (this.orderBy === 'star') {
                return this.filteredHotels.slice().sort((a, b) => b.star - a.star);
            } else {
                return this.filteredHotels;
            }
        },
        paginatedHotels() {
            const startIndex = (this.currentPage - 1) * this.pageSize;
            const endIndex = startIndex + this.pageSize;
            return this.sortedHotels.slice(startIndex, endIndex);
        },
        pages() {
            return Math.ceil(this.sortedHotels.length / this.pageSize);
        },
    },
    methods: {
        changePage(page) {
            this.currentPage = page;
        },
        fetchHotels() {
            fetch('api/hotels')
                .then(response => response.json())
                .then(data => {
                    this.hotels = data;
                    this.hotels.forEach(hotel => {
                        this.uniqueCountries.add(hotel.country);
                        this.uniqueCities.add(hotel.city);
                    });
                    this.uniqueCountries = Array.from(this.uniqueCountries);
                    this.uniqueCities = Array.from(this.uniqueCities);
                })
                .catch(error => console.error('Error fetching hotels:', error));
        },
    },
    mounted() {
        this.fetchHotels();
    },
});
