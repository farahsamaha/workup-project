<template>
  <v-container
    ><v-card elevation="0" class="ma-3">
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
                  job.location_id
                }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6"
                  >work place type</v-list-item-title
                >
                <v-list-item-subtitle>{{ job.place_id }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6">job type</v-list-item-title>
                <v-list-item-subtitle>{{ job.type_id }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6">Email</v-list-item-title>
                <v-list-item-subtitle>{{ job.Email }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-divider class="mx-6"></v-divider>
            <v-list-item class="my-2">
              <v-list-item-content>
                <v-list-item-title class="text-h6"
                  >Description</v-list-item-title
                >
                <v-card-text>{{ job.Description }} </v-card-text>
              </v-list-item-content>
            </v-list-item>
            <v-row>
              <v-btn
                class="d-flex pa-2 ml-auto mb-5"
                type="submit"
                color="orange darken-3"
                dark
              >
                Apply Now
              </v-btn></v-row
            >
          </v-container>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script>
import JobLayout from "../../layouts/JobLayout";
export default {
  layout: JobLayout,

  props: ["job"],
};
</script>

<style>
</style>
