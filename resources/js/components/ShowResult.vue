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
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>Image</th>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Blood group</th>

                                </tr>

                                <tr  v-for="row in rows" :key="row.id">
                                    <td><img style="width: 75px; height: 75px" :src="'/'+row.avatar" alt="image" /></td>
                                    <td>{{ row.name }}</td>
                                    <td>{{ row.email }}</td>
                                    <td>{{ row.phone }}</td>
                                    <td>{{ row.address }}</td>
                                    <td>{{ row.blood_group }}</td>

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
