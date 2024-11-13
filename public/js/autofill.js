  // Room type details
  const roomDetails = {
    single: { capacity: 1, price: 100 },
    double: { capacity: 2, price: 150 },
    queen: { capacity: 3, price: 200 },
    king: { capacity: 4, price: 250 }
};

// DOM elements
const roomTypeSelect = document.getElementById('room_type');
const capacityInput = document.getElementById('capacity');
const priceInput = document.getElementById('price_per_night');

// Event listener for room type change
roomTypeSelect.addEventListener('change', function () {
    const selectedRoomType = this.value;
    if (roomDetails[selectedRoomType]) {
        capacityInput.value = roomDetails[selectedRoomType].capacity;
        priceInput.value = roomDetails[selectedRoomType].price;
    } else {
        capacityInput.value = '';
        priceInput.value = '';
    }
});