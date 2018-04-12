<template>
    <div>
        <button :disabled="loading || fetching" @click="fetchData">
            Обновить данные
        </button>

        <p v-if="loading">Данные загружаются...</p>

        <table v-else class="table mt-1">
            <thead>
                <th>Название валюты</th>
                <th>Цена</th>
                <th>Количество</th>
            </thead>

            <tbody>
                <tr v-for="(item, index) in data" :key="index">
                    <td v-text="item.name"></td>
                    <td v-text="volume(item.volume)"></td>
                    <td v-text="amount(item.price.amount)"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data: [],
            loading: true,
            fetching: true,
            interval: null,
        };
    },

    created() {
        this.fetchData();
    },

    methods: {
        volume(value) {
            return Math.round(value).toFixed(0);
        },

        amount(value) {
            return (Math.round(value * 100) / 100).toFixed(2);
        },

        fetchData() {
            clearInterval(this.interval);

            this.fetching = true;

            axios.get('/data')
                .then(({ data }) => {
                    this.data = data;

                    this.loading = false;
                    this.fetching = false;

                    this.startAutoRefresh();
                });
        },

        startAutoRefresh() {
            this.interval = setInterval(this.fetchData, 15000);
        }
    }
}
</script>

<style>
.mt-1 {
    margin-top: 1rem;
}

.table, .table td, .table th {
    border: 1px solid black;
    border-collapse: collapse;
}

.table td, .table th {
    padding: 0 .5rem;
    height: 50px;
}
</style>
