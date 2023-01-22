export interface about {
  totalRooms: number;
  availableRooms: number;
  bookedRooms: number;
}

export interface roomList {
  roomNumber: number;
  roomType: string;
  amenities: string;
  price: number;
  photos: string;
  checkinTime: Date;
  checkoutTime: Date;
}
