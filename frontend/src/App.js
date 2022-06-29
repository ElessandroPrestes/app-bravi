import React from 'react';
import { Provider } from 'react-redux'
import { store } from './store/store'
import {createTheme, ThemeProvider} from '@mui/material/styles'
import { blue } from '@mui/material/colors'
import 'bootstrap/dist/css/bootstrap.min.css'
import Routes from "./Routes";

const theme = createTheme ({
  pallete: {
    primary:{
      main:blue[500]
    },
  },
  props:{
    MuiTextField:{
      variant: 'outlined',
      fullWidth: true
    },
    MuiSelect: {
      variant: 'outlined',
      fullWidth: true
    }
  }
});

const App = () => (
    <Provider store={store}>
        <ThemeProvider theme={theme}>
            <Routes></Routes>
        </ThemeProvider>
    </Provider>
);

export default App;