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
                    <td v-text="item.volume"></td>
                    <td v-text="item.price.amount"></td>
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
    padding: .25rem .5rem;
}
</style>
