<template>
  <v-container>
    <v-row align-content="center">
      <v-col class="ml-16">
        <v-card elevation="3" height="150" width="900">
          <v-row>
            <v-col cols="2">
              <v-img
                src="/assets/ad.jpg"
                height="100"
                width="150"
                class="mx-5 my-3"
              >
              </v-img>
            </v-col>
            <v-row>
              <v-col cols="8">
                <v-container>
                  <v-card-title>Full-stack deveolper</v-card-title>
                  <v-row>
                  <p class="ml-7 blue--text" ><v-icon>mdi-add-location</v-icon>Damascus,Syria .</p>
                  <p class=" orange--text">Remotly</p></v-row>
                     <v-card-subtitle class="green--text"> Full-time  </v-card-subtitle>
                </v-container>
              </v-col>
              </v-row>
            <v-col cols="3" align-self="center">
              <v-btn dark rounded class="deep-orange darken-1"
               :href="route('showjob')"
              >Show details</v-btn>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {};
</script>

<style>
</style>
