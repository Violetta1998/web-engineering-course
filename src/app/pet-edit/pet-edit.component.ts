import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';
import { Pet } from '../pet';
import { PetService } from '../pet.service';

@Component({
  selector: 'app-pet-edit',
  templateUrl: './pet-edit.component.html',
  styleUrls: ['./pet-edit.component.css']
})

export class PetEditComponent implements OnInit {

  public pet: Pet = new Pet;

  constructor(private petService: PetService,
    private location: Location,
    private route: ActivatedRoute,
    private router: Router) { }

  public async ngOnInit(): Promise<void> {
    let id = parseInt(this.route.snapshot.paramMap.get('id') || '');
    if (id) {
      this.pet = await this.petService.getPet(id);
    }
  }

  public async onSaveChanges(modifiedPet: Pet): Promise<void> {
    if (this.pet) {
      await this.petService.updatePets(this.pet.id, modifiedPet);
      this.location.back();
    }
    else {
      await this.petService.addPet(modifiedPet);
      this.router.navigate(['pets']);
    }
  }

}
