<template>
    <div>

        <!--        this component is for the second step of the form-->
        <div v-if="item===2 && currentStep===''  ">
            <div class="container pt-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Second Step (Please Provide Educational, Publication and Experience
                            Information)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                           href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Education</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                           href="#nav-profile" role="tab" aria-controls="nav-profile"
                                           aria-selected="false">Publication</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                           href="#nav-contact" role="tab" aria-controls="nav-contact"
                                           aria-selected="false">Experience</a>
                                    </div>
                                </nav>
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">

                                        <div class="row pb-5">
                                            <div class="col-md-12 d-flex justify-content-center">

                                                <ul>
                                                    <li>Provide your essential educational information in this section
                                                    </li>
                                                    <li>Input your institution name, degree and result correctly</li>
                                                    <li>Use add more button for multiple input</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="education" v-for="(education, counter) in educations"
                                             v-bind:key="counter">

                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label for="Institute">Institute</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Institute" v-model="education.institute"
                                                           required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Degree">Degree</label>
                                                    <input type="text" class="form-control" placeholder="Enter Degree"
                                                           v-model="education.degree" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Result">Result</label>
                                                    <input type="text" class="form-control" placeholder="Enter Result"
                                                           v-model="education.result" required>
                                                </div>

                                            </div>


                                        </div>

                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button class="btn btn-danger" @click="addEducation">Add More</button>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                         aria-labelledby="nav-profile-tab">


                                        <div class="row pb-5">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <ul>
                                                    <li>Provide your publication information in this section</li>
                                                    <li>Input your Publication topic, publisher results correctly</li>
                                                    <li>Use add more button for multiple input</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="education" v-for="(publication, counter) in publications"
                                             v-bind:key="counter">

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="topic">Publication Topic</label>
                                                    <input type="text" class="form-control" placeholder="Enter Topic"
                                                           v-model="publication.publication_topic" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="name">Publisher's Name</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Publisher's Name"
                                                           v-model="publication.publisher_name" required>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button class="btn btn-danger" @click="addPublication">Add More</button>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">
                                        <div class="row pb-5">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <ul>
                                                    <li>Provide your previous experiences in this section</li>
                                                    <li>Input your Company name, position and duration of employment
                                                        correctly
                                                    </li>
                                                    <li>Use add more button for multiple input</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="education" v-for="(experience, counter) in experiences"
                                             v-bind:key="counter">

                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label for="company_name">Company Name</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Company Name"
                                                           v-model="experience.company_name" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="position">Position</label>
                                                    <input type="text" class="form-control" placeholder="Enter Position"
                                                           v-model="experience.position" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="duration">Duration</label>
                                                    <input type="text" class="form-control" placeholder="Enter Duration"
                                                           v-model="experience.duration" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button class="btn btn-danger" @click="addExperience">Add More</button>
                                            <br>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row pt-4">

                <div class="col-md-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" @click.prevent="goToStep(3)">
                        Next Step
                    </button>
                </div>
            </div>
        </div>

        <div v-else>
            <ThirdComponent :basicInfo="basicInfo" :experiences="experiences" :educations="educations"
                            :publications="publications"/>
        </div>

    </div>
</template>

<script>
import ThirdComponent from "./ThirdComponent";

export default {
    name: "SecondComponent",
    props: ["item", "basicInfo"],
    components: {ThirdComponent},
    data() {
        return {
            currentStep: '',
            educations: [
                {
                    institute: '',
                    degree: '',
                    result: ''
                }
            ],
            publications: [
                {
                    publication_topic: '',
                    publisher_name: '',
                }
            ],

            experiences: [
                {
                    company_name: '',
                    position: '',
                    duration: ''
                }
            ],

        };
    },

    methods: {
        goToStep: function (step) {
            this.currentStep = step;
        },
        addEducation() {
            this.educations.push({
                institute: '',
                degree: '',
                result: ''
            })
        },

        addPublication() {
            this.publications.push({
                publication_topic: '',
                publisher_name: '',
            })
        },

        addExperience() {
            this.experiences.push({
                company_name: '',
                position: '',
                duration: '',
            })
        },
    }
}
</script>

<style scoped>


.tab-content {

    min-height: 375px !important;

}
</style>
