import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Pet } from './pet';

@Injectable({
  providedIn: 'root'
})
export class PetService {

  private apiUrl = 'http://127.0.0.1:8000/api/pets';

  constructor(private httpClient: HttpClient) { }

  public getPets(): Promise<Pet[]> {
    return this.httpClient.get<Pet[]>(this.apiUrl).toPromise();
  }

  public getPet(id: number): Promise<Pet> {
    return this.httpClient.get<Pet>(this.apiUrl + '/' + id).toPromise();
  }

  public updatePets(id: number, modifiedPet: Pet): Promise<Pet> {
    return this.httpClient.patch<Pet>(this.apiUrl + '/' + id, modifiedPet).toPromise();
  }

  public addPet(newPet: Pet): Promise<Pet> {
    return this.httpClient.post<Pet>(this.apiUrl, newPet).toPromise();
  }

  public deletePet(id: number): Promise<void> {
    return this.httpClient.delete<void>(this.apiUrl + '/' + id).toPromise();
  }
}
