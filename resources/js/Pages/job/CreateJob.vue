<template>
  <div class="cover">
    <v-container>
      <v-card class="mx-auto" max-width="700" height="1000" elevation="0">
        <v-card-title
          class="text-h4 my-8 font-weight-bold orange--text justify-center"
          >Find a great hire fast!
        </v-card-title>

        <form>
          <h3 class="font-weight-medium mx-16">Job Title</h3>
          <v-text-field
            label="title"
            outlined
            class="mx-16"
            v-model="title"
            :counter="40"
            :error-messages="errors"
            require
          ></v-text-field>

          <h3 class="font-weight-medium mx-16">Job Category</h3>
          <v-select
            label="Information Technology"
            class="mx-16"
            outlined
            v-model="select"
            :items="category"
            :error-messages="errors"
            required
          ></v-select>

          <h3 class="font-weight-medium mx-16">Work place type</h3>
          <v-select
            label="Remotly"
            class="mx-16"
            outlined
            v-model="select"
            :items="work"
            :error-messages="errors"
            required
          ></v-select>

          <h3 class="font-weight-medium mx-16">Job location</h3>
          <v-select
            label="Damascus"
            class="mx-16"
            outlined
            v-model="select"
            :items="location"
            :error-messages="errors"
            required
          ></v-select>

          <h3 class="font-weight-medium mx-16">Job type</h3>
          <v-select
            label="Full-time"
            class="mx-16"
            outlined
            v-model="select"
            :items="type"
            :error-messages="errors"
            required
          ></v-select>
          <h3 class="font-weight-medium mx-16">Email</h3>
          <v-text-field
            type="email"
            label="add your email for communication"
            outlined
            class="mx-16"
            v-model="title"
            :counter="40"
            :error-messages="errors"
            require
          ></v-text-field>

          <h3 h3 class="font-weight-medium mx-16">Description</h3>
          <v-textarea
            class="mx-16"
            label="Add skills and requirements you're looking for"
            auto-grow
            outlined
            row-height="15"
          ></v-textarea>
          <v-btn
            type="submit"
            class="mx-16"
            rounded
            color="orange darken-3"
            dark
          >
            Post Job
          </v-btn>
        </form>
      </v-card>
    </v-container>
  </div>
</template>

<script>
import JobLayout from "../../layouts/JobLayout";
export default {
  layout: JobLayout,
   remember: 'form',

  data: () => ({

    form: this.$inertia.form({
      title: "",
      category: "",
      place: "",
      location: "",
      type: "",
      email: "",
      description: "",
    }),

    // category: [
    //   "Information Technology",
    //   "Economy",
    //   "Adminstiration Mangement",
    //   "Others",
    // ],
    // work: ["On-site", "Hybird", "Remote"],
    // location: [
    //   "Damascus",
    //   "Aleppo",
    //   "Hamah",
    //   "Homs",
    //   "Lattakia",
    //   "Tartus",
    //   "Al-Raqqah",
    //   "Dayr al-Zawr",
    //   "Darʿā",
    // ],
    // type: ["full-time", "part-time", "temporary", "volunteer", "internship"],
  }),

  methods: {
    store() {
      this.form.post("/jobs");
    },
  },
};
</script>

<style></style>
