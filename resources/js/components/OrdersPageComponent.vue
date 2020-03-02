<template>
    <div class="container">

    <el-table
        :data="tableData"
        style="width: 100%"
    >
        <el-table-column
            prop="time"
            label="Время"
            width="180">
        </el-table-column>
        <el-table-column
            prop="date"
            label="Дата"
            width="120">
        </el-table-column>
        <el-table-column
            prop="name"
            label="Имя"
            width="250">
        </el-table-column>
        <el-table-column
            prop="place"
            label="Address">
        </el-table-column>
        <el-table-column label="Операции">
            <template slot-scope="scope">
                <el-button
                    size="mini"
                    type="danger"
                    @click="destroy(scope.row.index, scope.row.id)"
                >Delete</el-button>
            </template>
        </el-table-column>
    </el-table>

    </div>
</template>

<script>
    export default {
        name: "OrdersPageComponent",
        data() {
            return {
                tableData: []
            }
        },
        created() {
          this.init()
        },
        methods: {
            init() {
                window.axios.get('orders/show')
                    .then(response => {
                        this.tableData = response.data.tableData;
                    })
            },
            destroy(index, id) {
                window.axios.post('orders/destroy', {id: id})
                    .then(response => {
                        this.tableData.splice(index, 1)
                    })
            }
        }
    }
</script>

<style scoped>
    body {
        background-color: #0c5460;
    }
</style>
