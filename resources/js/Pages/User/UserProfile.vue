<template>
    <div class="cover">
    <v-container>
      <v-row no-gutters>
        <v-col>
          <v-card height="250" tile >
            <v-card height="100">
              <v-img
                height="180"
                src="https://media.istockphoto.com/photos/top-view-of-dark-green-velour-fabric-picture-id928376866?k=20&m=928376866&s=612x612&w=0&h=c2pcp-FuEH7cgME0vcMfr4XC3QtcQ3WD4DXkfPcPDoU="
              >
              </v-img>
            </v-card>

            <v-avatar class="profile ml-10" color="grey" size="170">
              <v-icon dark> mdi-account-circle </v-icon>
            </v-avatar>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

    <v-container>
      <v-row no-gutters>
        <v-col cols="3" md="4">
        <personal-info/>
        <user-cv/>
        </v-col>
        <v-col cols="9" sm="6" md="8">
            <post-index/>
        </v-col>
      </v-row>
    </v-container>
    </div>
</template>

<script>
import PersonalInfo from "@/Components/User/PersonalInfo.vue";
import UserCv from '@/Components/User/UserCv.vue';
import PostIndex from '../post/PostIndex.vue';
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";
export default {
      layout: AuthenticatedLayout,
    components: { PersonalInfo, UserCv, PostIndex},
};
</script>
