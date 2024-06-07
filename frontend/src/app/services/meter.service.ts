import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { MeterReading } from '../models/meter-reading.model';

@Injectable({
  providedIn: 'root'
})
export class MeterService {
  private apiUrl = 'http://127.0.0.1:8000/api';

  constructor(private http: HttpClient) { }

  addMeterReading(reading: MeterReading): Observable<MeterReading> {
    return this.http.post<MeterReading>(`${this.apiUrl}/meter-readings`, reading);
  }

  getAnalytics(): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/analytics`);
  }
}
