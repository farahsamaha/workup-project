<template>
    <div class="cover">
        <v-container>
            <v-card class="mx-auto" max-width="800" height="900">
                <v-toolbar flat color="teal accent-4" dark>
                    <v-btn icon>
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title> Create a job </v-toolbar-title>
                </v-toolbar>

                <v-card-text>
                    <h1 class="text-h3 mb-2">Find a great hire, fast</h1>
                </v-card-text>

                <form class="ml-5 mr-5">
                    <h3 class="text-h5 mb-2 ml-5">Job Title</h3>
                    <v-text-field
                        v-model="title"
                        :counter="40"
                        :error-messages="errors"
                        require
                    ></v-text-field>

                    <h3 class="text-h5 mb-2 ml-5">Job Category</h3>
                    <v-select
                        v-model="select"
                        :items="category"
                        :error-messages="errors"
                        required
                    ></v-select>

                    <h3 class="text-h5 mb-2 ml-5">Work place type</h3>
                    <v-select
                        v-model="select"
                        :items="work"
                        :error-messages="errors"
                        required
                    ></v-select>

                    <h3 class="text-h5 mb-2 ml-5">Job location</h3>
                    <v-select
                        v-model="select"
                        :items="location"
                        :error-messages="errors"
                        required
                    ></v-select>

                    <h3 class="text-h5 mb-2 ml-5">Job type</h3>
                    <v-select
                        v-model="select"
                        :items="type"
                        :error-messages="errors"
                        required
                    ></v-select>

                    <h3 class="text-h5 mb-2 ml-5">Description</h3>
                    <v-textarea
                        label="Add skills and requirements you're looking for"
                        auto-grow
                        outlined
                        row-height="15"
                    ></v-textarea>
                    <v-btn block rounded color="teal accent-4" dark>
                        Post and add to profile
                    </v-btn>
                </form>
            </v-card>
        </v-container>
    </div>
</template>

<script>
export default {
    data: () => ({
        category: [
            "Information Technology",
            "Economy",
            "Adminstiration Mangement",
            "Others",
        ],
        work: ["On-site", "Hybird", "Remote"],
        location: [
            "Damascus",
            "Aleppo",
            "Hamah",
            "Homs",
            "Lattakia",
            "Tartus",
            "Al-Raqqah",
            "Dayr al-Zawr",
            "Darʿā",
        ],
        type: [
            "full-time",
            "part-time",
            "temporary",
            "volunteer",
            "internship",
        ],
    }),

    methods: {
        submit() {
            this.$refs.observer.validate();
        },
    },
};
</script>

<style></style>
