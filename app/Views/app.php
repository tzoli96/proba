<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próbafeladat</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div id="app" class="container mt-5">
    <h2>Hotel List</h2>

    <!-- Filters -->
    <div class="mb-3">
        <label for="countryFilter">Filter by Country:</label>
        <select v-model="selectedCountry" id="countryFilter" class="form-control">
            <option value="">All</option>
            <option v-for="country in uniqueCountries" :key="country" :value="country">{{ country }}</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="cityFilter">Filter by City:</label>
        <select v-model="selectedCity" id="cityFilter" class="form-control">
            <option value="">All</option>
            <option v-for="city in uniqueCities" :key="city" :value="city">{{ city }}</option>
        </select>
    </div>

    <!-- Sorting -->
    <div class="mb-3">
        <label for="sortBy">Sort by:</label>
        <select v-model="orderBy" id="sortBy" class="form-control">
            <option value="">None</option>
            <option value="price">Price</option>
            <option value="star">Star</option>
        </select>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item" v-for="page in pages" :key="page" :class="{ active: page === currentPage }">
                <a class="page-link" @click="changePage(page)">{{ page }}</a>
            </li>
        </ul>
    </nav>
    <!-- Hotel List -->
    <div class="row">
        <div v-for="hotel in paginatedHotels" :key="hotel.id" class="col-md-4 mb-4">
            <div class="card">
                <img v-if="hotel.image" :src="hotel.image" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">{{ hotel.hotel_name }}</h5>
                    <p class="card-text">Country: {{ hotel.country }}</p>
                    <p class="card-text">City: {{ hotel.city }}</p>
                    <p class="card-text">Price: {{ hotel.price }}</p>
                    <p class="card-text">Star: {{ hotel.star }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<!-- Your Vue.js code -->
<script src="app.js"></script>

</body>
</html>
