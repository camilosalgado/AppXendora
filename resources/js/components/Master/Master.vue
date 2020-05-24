<template>
  <!--<b-container fluid>
        <b-row>
            <b-col cols="12">
                <b-card title="Card Title" no-body>
                    <b-card-header header-tag="nav">
                        <b-nav card-header tabs>
                            <b-nav-item active href="/applications">Applications</b-nav-item>
                            <b-nav-item>Inactive</b-nav-item>
                            <b-nav-item disabled>Disabled</b-nav-item>
                        </b-nav>
                    </b-card-header>

                    <b-card-body class="text-center">
                        <b-card-text>
                            With supporting text below as a natural lead-in to additional content.
                        </b-card-text>

                        <b-button variant="primary">Go somewhere</b-button>
                    </b-card-body>
                </b-card>
                <b-tabs active-nav-item-class="font-weight-bold text-uppercase text-danger"
                        active-tab-class="font-weight-bold text-success" content-class="mt-3">

                    <b-tab title="Applications" active>
                        <ApplicationIndex></ApplicationIndex>
                    </b-tab>
                    <b-tab title="Modules">
                        <ModuleIndex></ModuleIndex>
                    </b-tab>
                    <b-tab title="Roles">

                    </b-tab>
                    <b-tab title="Permissions">

                    </b-tab>
                </b-tabs>
            </b-col>
        </b-row>
  </b-container>-->
</template>

<script>
import ApplicationIndex from "../Applications/ApplicationIndex";
import ModuleIndex from "../Modules/ModuleIndex";

export default {
  name: "Master",
  components: {
    ApplicationIndex,
    ModuleIndex
  },
  data() {
    return {
      application: {
        icon_path: null
      },
      applications: [],
      outlined: false
    };
  },
  methods: {
    fetchApplications() {
      let url = "http://127.0.0.1:8000/applications/getapps";

      axios
        .get(url)
        .then(res => {
          this.applications = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    saveApp() {
      let url = "http://127.0.0.1:8000/applications/saveapp";

      axios
        .post(url, this.application)
        .then(res => {
          if (res.status == 201) {
            this.$bvToast.toast(`${res.data.msg}`, {
              title: "Application",
              variant: "success"
            });
          }

          if (res.status == 200) {
            this.$bvToast.toast(`${res.data.msg}`, {
              title: "Application",
              variant: "danger"
            });
          }

          /*
                        this.clearFields();
                        this.fetchApplications();*/
        })
        .catch(err => {
          console.log(err);
        });
    },
    clearFields() {
      this.application.name = "";
      this.application.description = "";
      this.application.icon_path = "";
      this.application.app_url = "";
    }
  },
  created() {
    this.fetchApplications();
  }
};
</script>

<style scoped>
</style>
