<template>
  <v-card elevation="3" height="130" width="600">
    <v-container>
      <v-row
        ><v-col cols="8">
          <v-card-title>{{ job.title }}</v-card-title>
          <v-row>
            <p class="ml-7 blue--text">
              <v-icon>mdi-add-location</v-icon>{{ job.location.name }} .
            </p>
            <p class="orange--text">
              {{ job.places.map((place) => place.name).join(",") }}
            </p></v-row
          >
          <p class="green--text ml-4">
            {{ job.types.map((type) => type.name).join(",") }}
          </p>
        </v-col>

        <v-col cols="3" class="mr-3" align-self="center">
          <v-btn
            rounded
            color="orange darken-3"
            dark
            :href="route('showjob', { job })"
            @click.prevent="$inertia.visit(route('showjob', { job }))"
            >Show details</v-btn
          >
        </v-col></v-row
      >
    </v-container>
  </v-card>
</template>

<script>
export default {
  props: {
    job: Object,
  },
  methods: {
    showJob() {
      this.$inertia.get(`/jobs/${this.job.id}`);
    },
  },
};
</script>

<style>
</style>
