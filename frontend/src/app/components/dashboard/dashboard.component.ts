import { Component, OnInit } from '@angular/core';
import { MeterService } from '../../services/meter.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss']
})
export class DashboardComponent implements OnInit {
  analytics: any[] = [];
  colorScheme = 'vivid'; // Change this line

  constructor(private meterService: MeterService) { }

  ngOnInit() {
    this.meterService.getAnalytics().subscribe(data => {
      this.analytics = [
        { name: 'Total Consumption', value: data.total_consumption },
        { name: 'Average Consumption', value: data.average_consumption },
        { name: 'Max Consumption', value: data.max_consumption },
        { name: 'Min Consumption', value: data.min_consumption },
      ];
    });
  }

  logout() {
    localStorage.removeItem('token');
    // Redirect to login or handle logout logic
  }
}