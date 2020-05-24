<template>
  <b-container fluid>
    <b-row>
      <b-col cols="4">
        <b-card-group deck>
          <b-card header="Create an User" header-tag="header">
            <b-form enctype="multipart/form-data">
              <b-form-group id="input-group-1" label="User Name" label-for="input-1">
                <b-form-input
                  id="input-1"
                  v-model="user.name"
                  type="text"
                  required
                  placeholder="Enter User Name"
                ></b-form-input>
              </b-form-group>
              <b-form-group
                id="textarea-group-1"
                label="Application Description"
                label-for="texta-1"
              >
                <b-form-textarea
                  id="texta-1"
                  v-model="application.description"
                  placeholder="Enter Description Here..."
                  rows="3"
                  max-rows="6"
                ></b-form-textarea>
              </b-form-group>

              <hr />

              <b-form-group id="buttons" class="text-right">
                <b-button variant="danger" type="reset">
                  <i class="fa fa-times"></i> Cancel
                </b-button>
                <b-button variant="success" @click="saveApp">
                  <i class="fa fa-save"></i> Save
                </b-button>
              </b-form-group>
            </b-form>
          </b-card>
        </b-card-group>
      </b-col>
      <b-col cols="8">
        <b-list-group>
          <b-list-group-item v-for="app in applications" :key="app.id">
            {{ app.name }}
            <b-button pill variant="danger" class="float-right" title="Desactivar">
              <i class="fa fa-power-off"></i>
            </b-button>
          </b-list-group-item>
        </b-list-group>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: "ApplicationIndex",
  data() {
    return {
      user: {
        icon_path: null
      },
      users: [],
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
              variant: "success",
              toaster: "b-toaster-bottom-right"
            });
          }

          if (res.status == 200) {
            this.$bvToast.toast(`${res.data.msg}`, {
              title: "Application",
              variant: "danger",
              toaster: "b-toaster-bottom-right"
            });
          }

          this.clearFields();
          this.fetchApplications();
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
