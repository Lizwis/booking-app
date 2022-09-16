<template>
  <div class="row justify-content-center mx-0">
    <div class="col-lg-5 border my-4">
      <div class="col-12 text-center pt-4">
        <h5 class="font-weight-light">Create booking here.</h5>
      </div>
      <form @submit.prevent="submit()">
        <div class="row">
          <div class="col-md-6 font-weight-bold pt-3">
            <h6 class="label">Name</h6>
            <input
              id="firstName"
              type="text"
              class="form-control mt-2"
              v-model="name"
              autocomplete="name"
              style="height: 45px"
              autofocus
            />
            <span class="text-danger font-weight-light" v-if="errors.name">{{
              errors.name[0]
            }}</span>
          </div>

          <div class="col-md-6 font-weight-bold pt-3">
            <h6 class="label">Surname</h6>
            <input
              id="surname"
              type="text"
              class="form-control mt-2"
              name="email"
              v-model="surname"
              autocomplete="surname"
              style="height: 45px"
              autofocus
            />
            <span class="text-danger font-weight-light" v-if="errors.surname">{{
              errors.surname[0]
            }}</span>
          </div>

          <div class="col-md-12 font-weight-bold pt-3">
            <h6 class="label">Booking Date</h6>

            <el-date-picker
              v-model="booking_date"
              type="date"
              placeholder="select date"
              style="width: 100%"
              format="yyyy-MM-dd"
              name="booking_date"
              class="mt-2"
            >
            </el-date-picker>
            <span
              class="text-danger font-weight-light"
              v-if="errors.booking_date"
              >{{ errors.booking_date[0] }}</span
            >
          </div>

          <div class="col-md-12 font-weight-bold pt-3">
            <h6 class="label">Booking Reason</h6>
            <textarea
              id="reason"
              class="form-control mt-2"
              name="reason"
              rows="4"
              v-model="reason"
            />
            <span class="text-danger font-weight-light" v-if="errors.reason">{{
              errors.reason[0]
            }}</span>
          </div>
          <div class="col-12 pt-4 pb-4">
            <div class="col-lg-12 px-0 float-left">
              <el-button
                type="primary"
                style="font-size: 16px; height: 45px"
                class="submit-button btn-block"
                @click="submit"
              >
                Book Now</el-button
              >
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import User from "../api/User";
import moment from "moment";

export default {
  data: function () {
    return {
      fields: {},
      name: "",
      surname: "",
      booking_date: "",
      reason: "",

      errors: [],
    };
  },
  methods: {
    submit() {
      (this.fields.name = this.name),
        (this.fields.surname = this.surname),
        (this.fields.reason = this.reason),
        (this.fields.booking_date = moment(this.booking_date).format(
          "yyyy-MM-DD"
        )),
        User.bookingCreate(this.fields)
          .then(() => {
            this.$router.push({ name: "/Home" });
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
          });
    },
  },
};
</script>
<style scoped></style>
