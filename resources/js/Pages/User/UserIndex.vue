<template>
    <div class="cover">
        <v-container>
            <v-row no-gutters>
                <v-col>
                    <v-card height="330" tile>
                        <v-card height="170">
                            <v-img
                                height="250"
                                src="https://media.istockphoto.com/photos/top-view-of-dark-green-velour-fabric-picture-id928376866?k=20&m=928376866&s=612x612&w=0&h=c2pcp-FuEH7cgME0vcMfr4XC3QtcQ3WD4DXkfPcPDoU="
                            >
                            </v-img>
                            <v-card-title
                                    class="text-h4 my-1 font-weight-bold justify-center"
                                    >{{user.name}}
                                </v-card-title>
                        </v-card>
                                <v-avatar
                                    class="profile ml-15 my-5"
                                    color="grey"
                                    size="170"
                                    src=" :$user->featured_image"
                                >
                                    <v-icon dark> mdi-account-circle </v-icon>
                                </v-avatar>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>

        <v-container>
            <v-row no-gutters>
                <v-col cols="3" md="4">
                    <personal-info />
                    <user-cv />
                </v-col>
                <v-col cols="9" sm="6" md="8">
                    <post-index />
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import PersonalInfo from "@/Components/User/PersonalInfo.vue";
import UserCv from "@/Components/User/UserCv.vue";
import PostIndex from "../post/PostIndex.vue";
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";
export default {
    layout: AuthenticatedLayout,
    components: { PersonalInfo, UserCv, PostIndex },
    props:{
        users:Array
    }
};
</script>
