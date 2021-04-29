<template>

    <div>
        <div class="container pt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Third Step (Please provide avatar & both parts of NID)</h5>
                </div>
                <div class="card-body d-flex justify-content-center">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar" class="form-control-file" id="avatar"
                                   @change="onAvatarChange">
                        </div>

                        <div class="col-md-12">
                            <label for="nid_first_part">NID (First Part)</label>
                            <input type="file" name="nid_first_part" class="form-control-file" id="nid_first_part"
                                   @change="onNidFirstPartChange">
                        </div>


                        <div class="col-md-12">
                            <label for="nid_second_part">NID (Second Part)</label>
                            <input type="file" name="nid_second_part" class="form-control-file" id="nid_second_part"
                                   @change="onNidSecondPartChange">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-success" @click="submitForm()">Save</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "ThirdComponent",
    props: ["basicInfo", "experiences", "educations", "publications"],
    data() {
        return {
            currentStep: '',
            form: {
                name: this.basicInfo.name,
                email: this.basicInfo.email,
                phone: this.basicInfo.phone,
                nid: this.basicInfo.nid,
                educations: this.educations,
                experiences: this.experiences,
                publications: this.publications,
                avatar: null,
                nid_first_part: null,
                nid_second_part: null,
            }
        };
    },

    methods: {
        goToStep: function (step) {
            this.currentStep = step;
        },

        onAvatarChange(event) {
            this.form.avatar = event.target.files[0];
        },
        onNidFirstPartChange(event) {
            this.form.nid_first_part = event.target.files[0];

        },
        onNidSecondPartChange(event) {
            this.form.nid_second_part = event.target.files[0];
        },
        submitForm() {
            let formData = new FormData();
            formData.append("name", (this.form.name));
            formData.append("email", (this.form.email));
            formData.append("phone", (this.form.phone));
            formData.append("nid", (this.form.nid));
            formData.append("educations", JSON.stringify(this.form.educations));
            formData.append("experiences", JSON.stringify(this.form.experiences));
            formData.append("publications", JSON.stringify(this.form.publications));
            formData.append("avatar", this.form.avatar);
            formData.append("nid_first_part", this.form.nid_first_part);
            formData.append("nid_second_part", this.form.nid_second_part);

            axios.post("/post", formData).then((res) => {
                alert('I am here')
                console.log("success");
            }).catch((error) => {
                console.log(error);
            });

        },

    }
}
</script>

<style scoped>

</style>
