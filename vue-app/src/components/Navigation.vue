<template>
  <div class="col-12 px-0 pb-0 shadow-sm">
    <nav
      class="navbar navbar-expand-lg bg-gradient-light py-2 px-4"
      style="background-color: #ffffff !important; color: #606266"
    >
      <div class="container">
        <div class="col-12 px-0 py-0">
          <div class="row px-0 py-0">
            <div class="col-6 px-0 py-0">
              <router-link class="navbar-brand" to="/">
                <div class="col-12 px-0 mx-0">
                  <span class="pt-0">logo Home</span>
                </div>
              </router-link>
            </div>

            <div class="col-6 px-0 pt-2 text-right">
              <div v-if="user !== null">
                <el-dropdown trigger="click">
                  <span class="el-dropdown-link">
                    {{ user.name
                    }}<i class="el-icon-arrow-down el-icon--right"></i>
                  </span>
                  <el-dropdown-menu slot="dropdown">
                    <router-link :to="{ path: '/bookings-list' }">
                      <el-dropdown-item icon="el-icon-s-order">
                        Bookings
                      </el-dropdown-item>
                    </router-link>
                    <span @click="logout">
                      <el-dropdown-item icon="el-icon-plus"
                        >Logout</el-dropdown-item
                      >
                    </span>
                  </el-dropdown-menu>
                </el-dropdown>
              </div>

              <div v-else>
                <router-link class="mr-2" to="/login">
                  <el-button
                    class="auth-button"
                    plain
                    style="background: none; border: none; color: #007bff"
                    >Login</el-button
                  ></router-link
                >
                <router-link
                  class="lift font-weight-bold shadow"
                  to="/register"
                >
                  <el-button
                    class="auth-button py-2"
                    style="background-color: #007bff; color: #ffffff"
                    >REGISTER</el-button
                  >
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
import User from "../api/User";

export default {
  data() {
    return {
      user: null,
    };
  },

  mounted() {
    if (localStorage.getItem("token")) {
      this.getAuthUser();
    }
  },

  methods: {
    logout() {
      User.logout().then(() => {
        localStorage.removeItem("token");
        this.user = null;
        this.$router.push({ path: "/" });
      });
    },

    getAuthUser() {
      User.auth().then((response) => {
        this.user = response.data.user;
      });
    },
  },
};
</script>
<style scoped>
.auth-button {
  font-family: Gt-America-Font-bold !important;
  border-radius: 22px;
  height: 40px;
}
</style>
