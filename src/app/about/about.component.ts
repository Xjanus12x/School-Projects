import { Component } from '@angular/core';
import { about, roomList } from './about';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css'],
})
export class AboutComponent {
  myName = 'Alberto';
  myAge = 20;

  about: about = {
    totalRooms: 20,
    availableRooms: 10,
    bookedRooms: 5,
  };

  roomList: roomList[] = [
    {
      roomNumber: 0,
      roomType: 'Deluxe Room',
      amenities: 'Air Conditioner, Free Wi-Fi, TV, Bathroom, Kitchen',
      price: 500,
      photos:
        'https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FImage&psig=AOvVaw0bXlo-A1J7H2GHbkzdmoja&ust=1674127258968000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCNi-hpaA0fwCFQAAAAAdAAAAABAE',
      checkinTime: new Date('11-Nov-2021'),
      checkoutTime: new Date('12-Nov-2021'),
    },
    {
      roomNumber: 1,
      roomType: 'Deluxe Room1',
      amenities: 'Air Conditioner, Free Wi-Fi, TV, Bathroom, Kitchen1',
      price: 5001,
      photos:
        'https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FImage&psig=AOvVaw0bXlo-A1J7H2GHbkzdmoja&ust=1674127258968000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCNi-hpaA0fwCFQAAAAAdAAAAABAE',
      checkinTime: new Date('13-Nov-2021'),
      checkoutTime: new Date('14-Nov-2021'),
    },
    {
      roomNumber: 2,
      roomType: 'Deluxe Room2',
      amenities: 'Air Conditioner, Free Wi-Fi, TV, Bathroom, Kitchen2',
      price: 5002,
      photos:
        'https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FImage&psig=AOvVaw0bXlo-A1J7H2GHbkzdmoja&ust=1674127258968000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCNi-hpaA0fwCFQAAAAAdAAAAABAE',
      checkinTime: new Date('15-Nov-2021'),
      checkoutTime: new Date('16-Nov-2021'),
    },
  ];

  hideRooms = false;
  toggle() {
    this.hideRooms = !this.hideRooms;
  }
}
