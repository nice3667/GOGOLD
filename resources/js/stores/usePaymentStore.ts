import { defineStore } from 'pinia'

export const usePaymentStore = defineStore('usePaymentStore', {
  state: () => {
    return {
      url: {
        get_by_category: "",
        update: "",
      },
      form: {
        id: -1,
        data: {
          package_name: null,
          package_price : null,
        }
      },
    }
  },
  actions: {
    setPackage(name, price, packageName) {
      this.form.data.package_name = packageName;
      this.form.data.package_price = price;
    },
  },

});
