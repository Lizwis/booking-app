<template>
  <div>
    <div class="row justify-content-center pt-4 mt-0">
      <div class="col-lg-8 py-2 px-2 mx-2">
        <fieldset class="border p-2">
          <legend class="float-none w-auto">Filters</legend>
          <div class="row text-center">
            <div class="radio radio-primary col-12">
              <span class="pr-4" v-for="(val, key) in RadioList" :key="key">
                <input
                  type="radio"
                  name="radio"
                  :value="val"
                  v-model="changeFilter"
                  :id="val"
                  :checked="val == changeFilter"
                /><label>{{ val }}</label>
              </span>
            </div>
          </div>
        </fieldset>
      </div>
      <div class="col-lg-8 py-4 px-2 mx-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Date</th>
              <th scope="col">Reason</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(value, key) in bookings" :key="key">
              <th scope="row">{{ key + 1 }}</th>
              <td>{{ value.name }}</td>
              <td>{{ value.surname }}</td>
              <td>{{ value.booking_date }}</td>
              <td>
                <el-dialog :visible.sync="dialogVisible" :modal="true">
                  <p>{{ bookingReason }}</p>
                </el-dialog>

                <button
                  @click="populateReason(value.reason)"
                  class="btn btn-primary btn-sm"
                >
                  View Reason
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import User from "../api/User";

export default {
  data: function () {
    return {
      bookings: [],
      errors: [],
      dialogVisible: false,
      bookingReason: "",
      RadioList: ["Past", "Future", "All"],
      changeFilter: "",
    };
  },

  created() {
    this.setBooking();
  },

  watch: {
    changeFilter: function (newFilter) {
      User.bookingsFilter(newFilter).then((response) => {
        this.bookings = response.data;
      });
    },
  },

  methods: {
    setBooking() {
      User.getBookingsList()
        .then((response) => {
          this.bookings = response.data;
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
    populateReason(reason) {
      this.bookingReason = reason;
      this.dialogVisible = true;
    },
  },
};
</script>
<style scoped>
.label {
  font-size: 16px;
}
</style>
