import { Component, OnInit } from '@angular/core';
import { Pet } from '../pet';
import { PetService } from '../pet.service';

@Component({
  selector: 'app-pet-list',
  templateUrl: './pet-list.component.html',
  styleUrls: ['./pet-list.component.css']
})
export class PetListComponent implements OnInit {

  public pets: Pet[] = []

  constructor(private petService: PetService) {
  }

  public async ngOnInit(): Promise<void> {
    this.pets = await this.petService.getPets();
  }
}
