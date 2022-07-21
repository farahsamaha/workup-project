<template>
    <div class="cover">
        <v-container>
            <v-card class="mx-auto" max-width="700" height="1000" elevation="0">
                <v-card-title
                    class="text-h4 my-8 font-weight-bold orange--text justify-center"
                    >Complete your information
                </v-card-title>

                <form @submit.prevent="store" enctype="multipart/form-data">
                    <v-file-input
                        :rules="rules"
                        name="featured_image"
                        accept="image/png, image/jpeg, image/bmp"
                        placeholder="Pick an avatar"
                        prepend-icon="mdi-camera"
                        label="Avatar"
                    ></v-file-input>
                    <h3 class="font-weight-medium mx-16">Birth date</h3>
                    <v-text-field
                        label="1/1/1990"
                        outlined
                        class="mx-16"
                        v-model="form.birthdate"
                        :counter="40"
                        :error-messages="form.errors.birthdate"
                        require
                    ></v-text-field>

                    <h3 class="font-weight-medium mx-16">Mobile number</h3>
                    <v-text-field
                        label="0923455678"
                        outlined
                        class="mx-16"
                        v-model="form.mobile"
                        :counter="40"
                        :error-messages="form.errors.mobile"
                        require
                    ></v-text-field>

                    <h3 class="font-weight-medium mx-16">City</h3>
                    <v-select
                        label="Damascus"
                        class="mx-16"
                        outlined
                        v-model="form.city_id"
                        :error-messages="form.errors.city_id"
                        required
                    >
                        <option
                            v-for="city in cities"
                            :key="city.id"
                            :value="city.id"
                        >
                            {{ city.name }}
                        </option>
                    </v-select>

                    <h3 class="font-weight-medium mx-16">Skills</h3>
                    <v-select
                        label="communication"
                        class="mx-16"
                        outlined
                        v-model="form.skill_id"
                        :error-messages="form.errors.skill_id"
                        required
                    >
                        <option
                            v-for="skill in skills"
                            :key="skill.id"
                            :value="skill.id"
                        >
                            {{ skill.name }}
                        </option>
                    </v-select>

                    <h3 class="font-weight-medium mx-16">Education</h3>
                    <v-select
                        label="Software Engineering"
                        class="mx-16"
                        outlined
                        v-model="form.education_id"
                        :error-messages="form.errors.education_id"
                        required
                    >
                        <option
                            v-for="education in education"
                            :key="education.id"
                            :value="education.id"
                        >
                            {{ education.name }}
                        </option>
                    </v-select>

                    <h3 class="font-weight-medium mx-16">Experince</h3>
                    <v-select
                        label="2 years of training"
                        class="mx-16"
                        outlined
                        v-model="form.experince_id"
                        :error-messages="form.errors.experince_id"
                        required
                    >
                        <option
                            v-for="experince in experince"
                            :key="experince.id"
                            :value="experince.id"
                        >
                            {{ experince.name }}
                        </option>
                    </v-select>

                    <h3 class="font-weight-medium mx-16">Volunteering</h3>
                    <v-select
                        label="Full-time"
                        class="mx-16"
                        outlined
                        v-model="form.volunteering_id"
                        :error-messages="form.errors.type_id"
                        required
                    >
                        <option
                            v-for="volunteering in volunteering"
                            :key="volunteering.id"
                            :value="volunteering.id"
                        >
                            {{ volunteering.name }}
                        </option>
                    </v-select>
                    <h3 class="font-weight-medium mx-16">Email</h3>
                    <v-text-field
                        type="email"
                        label="add your email for communication"
                        outlined
                        class="mx-16"
                        :counter="40"
                        v-model="form.email"
                        :error-messages="form.errors.email"
                        require
                    ></v-text-field>

                    <h3 h3 class="font-weight-medium mx-16">Description</h3>
                    <v-textarea
                        class="mx-16"
                        label="Add skills and requirements you're looking for"
                        auto-grow
                        outlined
                        row-height="15"
                        v-model="form.description"
                        :error-messages="form.errors.description"
                    ></v-textarea>
                    <v-btn
                        type="submit"
                        class="mx-16"
                        rounded
                        color="orange darken-3"
                        dark
                    >
                        Add
                    </v-btn>
                </form>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";
export default {
    layout: AuthenticatedLayout,
    remember: "form",

    props: {
        skills: Array,
        education: Array,
        experince: Array,
        volunteering: Array,
    },

    data() {
        // rules: [
        //     (value) =>
        //         !value ||
        //         value.size < 2000000 ||
        //         "Avatar size should be less than 2 MB!",
        // ];
        return {
            form: this.$inertia.form({
                birthdate: "",
                mobile: "",
                city_id: null,
                skill_id: null,
                education_id: null,
                experince_id: null,
                volunteering_id: null,
            }),
        };
    },

    methods: {
        store() {
            this.form("/user");
        },
    },
};
</script>

<style></style>
