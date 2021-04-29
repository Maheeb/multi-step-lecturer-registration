<template>
    <div>
        <LayoutComponent/>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center text-success">All registered users</h5>
                        </div>
                        <div class="card-body">


                            <table class="table table-bordered">

                                <tr>
                                    <th width="50%">Name</th>
                                    <th width="50%">Email</th>
                                    <th width="50%">phone</th>
                                </tr>

                                <tr v-for="row in rows" :key="row.id">
                                    <td>{{ row.name }}</td>
                                    <td>{{ row.email }}</td>
                                    <td>{{ row.phone }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutComponent from "./LayoutComponent";
export default {
    data() {
        return {
            rows:[],
        }

    },
    components :{LayoutComponent},
    methods: {
        showUsers: function () {
            axios.get('/get-all-users').then(function (res) {
                this.rows = res.data;
                console.log(rows)
            }.bind(this));
        }
    },
    created: function () {
        this.showUsers()
    }

}

</script>
