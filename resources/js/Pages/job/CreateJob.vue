<template>
  <div class="cover">
    <v-container>
      <v-card class="mx-auto" max-width="700" height="1000" elevation="0">
        <v-card-title
          class="text-h4 my-8 font-weight-bold orange--text justify-center"
          >Find a great hire fast!
        </v-card-title>

        <form @submit.prevent="store">
          <h3 class="font-weight-medium mx-16">Job Title</h3>
          <v-text-field
            label="title"
            outlined
            class="mx-16"
            v-model="form.title"
            :counter="40"
            :error-messages="form.errors.title"
            require
          ></v-text-field>

          <h3 class="font-weight-medium mx-16">Job Category</h3>
          <v-select
            label="Information Technology"
            class="mx-16"
            outlined
            v-model="form.category"
            :error-messages="form.errors.category"
            required
          ></v-select>

          <h3 class="font-weight-medium mx-16">Work place type</h3>
          <v-select
            label="Remotly"
            class="mx-16"
            outlined
            v-model="form.place"
            :error-messages="form.errors.place"
            required
          ></v-select>

          <h3 class="font-weight-medium mx-16">Job location</h3>
          <v-select
            label="Damascus"
            class="mx-16"
            outlined
            v-model="form.location"
            :error-messages="form.errors.location"
            required
          ></v-select>

          <h3 class="font-weight-medium mx-16">Job type</h3>
          <v-select
            label="Full-time"
            class="mx-16"
            outlined
            v-model="form.type"
            :error-messages="form.errors.type"
            required
          ></v-select>
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
  remember: "form",

  data() {
    return {
      form: this.$inertia.form({
        title: "",
        category: "",
        place: "",
        location: "",
        type: "",
        email: "",
        description: "",
      }),
    };
  },

  methods: {
    store() {
      this.form.post("/jobs");
    },
  },
};
</script>

<style></style>
