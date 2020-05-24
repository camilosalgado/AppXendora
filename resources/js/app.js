require("./bootstrap");

import Vue from "vue";
import BootstrapVue from "bootstrap-vue";

// Install BootstrapVue
Vue.use(BootstrapVue);

Vue.component(
    "user-index-component",
    require("./components/Users/user").default
);

Vue.component(
    "application-index-component",
    require("./components/Applications/ApplicationIndex").default
);
Vue.component(
    "module-index-component",
    require("./components/Modules/ModuleIndex").default
);
Vue.component(
    "master-component",
    require("./components/Master/Master").default
);

const app = new Vue({
    el: "#app"
});
