<template>
  <v-row>
    <v-col cols="12">
      <!-- <v-card height="250" elevation="0" class="mt-1" > -->
            <!-- <v-img src="/assets/bg.jpg" max-height="400" max-width="1500"> -->
      <v-layout align-center column fill-height class="mt-9">
        <h1 class="orange--text" >Let Us Find Your Perfect Job !</h1>
        <v-row align="center" class="my-6">
          <v-btn text fab class="ml-9">
            <v-icon large color="teal accent-4">mdi-magnify</v-icon></v-btn
          >
          <v-col cols="4" sm="4">
            <v-select :items="category" label="Category"></v-select>
          </v-col>

          <v-col cols="4" sm="3">
            <v-select
              :items="location"
              prepend-icon="mdi-map-marker"
              label="Location"
            ></v-select>
          </v-col>

          <v-col cols="4" sm="3">
            <v-select
              :items="type"
              label="Type"
              prepend-icon="mdi-clock"
            ></v-select>
          </v-col> </v-row
      ></v-layout>
            <!-- </v-img> -->
    </v-col>
  </v-row>
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
    type: ["full-time", "part-time", "temporary", "volunteer", "internship"],
  }),
};
</script>

<style>
</style>
