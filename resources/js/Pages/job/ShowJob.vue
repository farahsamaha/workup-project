<template>
  <v-container
    ><v-card elevation="0" class="ma-3" max-height="1300">
      <v-row justify="center" align-content="center">
        <v-col cols="5"
          ><v-img height="600" class="mt-5" contain src="/assets/jobb.jpg">
          </v-img
        ></v-col>
        <!-- <v-divider vertical class="ma-9" /> -->
        <v-col cols="6">
          <v-container>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6">Job title</v-list-item-title>
                <v-list-item-subtitle>{{ job.title }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6"
                  >Job Location</v-list-item-title
                >
                <v-list-item-subtitle>{{
                  job.location.name
                }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6"
                  >work place type</v-list-item-title
                >
                <v-list-item-subtitle>{{
                  job.places.map((place) => place.name).join(", ")
                }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6">job type</v-list-item-title>
                <v-list-item-subtitle>{{
                  job.types.map((type) => type.name).join(", ")
                }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6">Email</v-list-item-title>
                <v-list-item-subtitle>{{ job.email }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6"
                  >Description</v-list-item-title
                >
                <v-card-text>{{ job.description }} </v-card-text>
              </v-list-item-content>
            </v-list-item>
            <v-row>
              <v-btn
                @click="unlike"
                v-if="job.liked"
                class="d-flex pa-2 ml-auto mb-5"
                color="green"
                dark
                ><v-icon>mdi-account-check</v-icon>Applied</v-btn
              >
              <v-btn
                v-else
                class="d-flex pa-2 ml-auto mb-5"
                color="orange darken-3"
                dark
                @click="like"
              >
                Apply Now
              </v-btn>
            </v-row>
          </v-container>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
import JobLayout from "../../Layouts/JobLayout";
export default {
  layout: JobLayout,
  props: ["job"],
  data() {
    return {
      apply: this.$inertia.form({
        userJob: this.job,
      }),
    };
  },
  methods: {
    like() {
      this.apply.post(this.route("apply", this.job), {
        preserveScroll: true,
        onSuccess: () => {},
      });
    },
  },
};
</script>

<style>
</style>
