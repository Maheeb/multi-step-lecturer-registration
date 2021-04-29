<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.

                        <test-component/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TestComponent from "./TestComponent";
    export default {
     components:{TestComponent},


        mounted() {
            console.log('Component mounted.')
        },

    }
</script>
