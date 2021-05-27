import { Component, EventEmitter, Input, OnChanges, Output } from '@angular/core';
import { AbstractControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Pet } from '../pet';

@Component({
  selector: 'app-pet-form',
  templateUrl: './pet-form.component.html',
  styleUrls: ['./pet-form.component.css']
})
export class PetFormComponent implements OnChanges {

  @Input() pet!: Pet;

  public petForm: FormGroup = this.formBuilder.group({
    'name': [ '', [ Validators.required ] ],
    'species': [ '', [ Validators.required ] ],
    'date_of_birth': [ '', [ Validators.required] ],
    'date_of_death' : [ '', [ Validators.nullValidator ] ],
    'note': ['', [Validators.required]]
  });

  public get name(): AbstractControl {
    return this.petForm.get('name') as AbstractControl;
  }
  public get species(): AbstractControl {
    return this.petForm.get('species') as AbstractControl;
  }
  public get date_of_birth(): AbstractControl {
    return this.petForm.get('date_of_birth') as AbstractControl;
  }
  public get date_of_death(): AbstractControl {
    return this.petForm.get('date_of_death') as AbstractControl;
  }
  public get note(): AbstractControl {
    return this.petForm.get('note') as AbstractControl;
  }

  @Output() saveChanges: EventEmitter<Pet> = new EventEmitter<Pet>();

  constructor(private formBuilder: FormBuilder) { }

  public ngOnChanges(): void {
    this.petForm.patchValue(this.pet);
  }

  public onSubmit(): void {
    if (this.petForm.valid) {
      this.saveChanges.emit(this.petForm.value);
    }
  }

}
